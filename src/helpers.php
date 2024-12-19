<?php

function redirect(string $location): void
{
    header("Location: $location", true, 302);
    exit;
}

function html_escape(string|null $text): string
{
    return htmlspecialchars($text ?? '', ENT_QUOTES, 'UTF-8', false);
}

function handle_avatar_upload(): bool | string
{
    if (!isset($_FILES['avatar'])) {
        return false;
    }

    $avatar = $_FILES['avatar'];
    $avatar_name = $avatar['name'];
    $avatar_tmp_name = $avatar['tmp_name'];
    $avatar_size = $avatar['size'];
    $avatar_error = $avatar['error'];

    if ($avatar_error !== 0 || $avatar_size > 10000000) {
        return false;
    }

    $avatar_new_name = uniqid() . '_' . $avatar_name;
    $avatar_destination = __DIR__ . '/../public/uploads/' . $avatar_new_name;
    if (move_uploaded_file($avatar_tmp_name, $avatar_destination)) {
        return $avatar_new_name;
    }
    return false;
}

function remove_avatar_file(string $filename): bool
{
    $old_avatar_file = realpath('/uploads/' . $filename);
    if (file_exists($old_avatar_file)) {
        return unlink($old_avatar_file);
    }
    return false;
}
