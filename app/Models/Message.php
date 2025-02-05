<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    CONST LIMIT_1 = 1;
    CONST LIMIT_2 = 2;
    CONST LIMIT_3 = 3;
    CONST LIMIT_4 = 4;
    CONST LIMIT_5 = 5;

    protected $fillable = [
        'chat_id',
        'sender_chat_id',
        'id',
        'message_thread_id',
        'user_id',
        'sender_boost_count',
        'date',
        'forward_from',
        'forward_from_chat',
        'forward_from_message_id',
        'forward_signature',
        'forward_sender_name',
        'forward_date',
        'is_topic_message',
        'is_automatic_forward',
        'reply_to_chat',
        'reply_to_message',
        'external_reply',
        'quote',
        'reply_to_story',
        'via_bot',
        'link_preview_options',
        'edit_date',
        'has_protected_content',
        'media_group_id',
        'author_signature',
        'text',
        'entities',
        'caption_entities',
        'audio',
        'document',
        'animation',
        'game',
        'photo',
        'sticker',
        'story',
        'video',
        'voice',
        'video_note',
        'caption',
        'has_media_spoiler',
        'contact',
        'location',
        'venue',
        'poll',
        'dice',
        'new_chat_members',
        'left_chat_member',
        'new_chat_title',
        'new_chat_photo',
        'delete_chat_photo',
        'group_chat_created',
        'supergroup_chat_created',
        'channel_chat_created',
        'message_auto_delete_timer_changed',
        'migrate_to_chat_id',
        'migrate_from_chat_id',
        'pinned_message',
        'invoice',
        'successful_payment',
        'users_shared',
        'chat_shared',
        'connected_website',
        'write_access_allowed',
        'passport_data',
        'proximity_alert_triggered',
        'boost_added',
        'forum_topic_created',
        'forum_topic_edited',
        'forum_topic_closed',
        'forum_topic_reopened',
        'general_forum_topic_hidden',
        'general_forum_topic_unhidden',
        'video_chat_scheduled',
        'video_chat_started',
        'video_chat_ended',
        'video_chat_participants_invited',
        'web_app_data',
        'reply_markup',
        'is_deleted'
    ];

    public $timestamps  = false;

    protected $table = "message";

    public static function getLastMessage($chatId) {
        return self::query()
            ->where('chat_id', $chatId)
            ->where('is_deleted', false)
            ->orderBy('id', 'desc')
            ->first();
    }

    public static function getLastDeletedMessage($chatId) {
        return self::query()
            ->where('chat_id', $chatId)
            ->where('is_deleted', true)
            ->orderBy('id', 'desc')
            ->first();
    }

    public static function updateIsDeleted($messageId) {
        return self::query()
            ->where('id', $messageId)
            ->update(['is_deleted' => true]);
    }
}
