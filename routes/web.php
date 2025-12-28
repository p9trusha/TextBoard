<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TopicController;
use Illuminate\Support\Facades\Route;

Route::get('//', [TopicController::class, 'index'])->name("home");

Route::get(
    '/{topic_name}/', [TopicController::class, 'topic']
    )->name("topic");

Route::post(
    '/add_topic/', [TopicController::class, 'add_topic']
    )->name("add_topic");


Route::get(
    '/{topic_name}/{thread_id}/',[PostController::class, 'thread']
    )->name("thread");

Route::post(
    '/{topic_name}/add_thread/', [PostController::class, 'add_thread']
    )->name("add_thread");

Route::post(
    '/{topic_name}/{thread_id}/add_message/',
    [PostController::class, 'add_messege']
    )->name("add_message");

Route::get(
    '/{topic_name}/{thread_id}/{message_id}/reply_message',
    [PostController::class, 'showReplyForm']
    )->name("reply_message.form");

 Route::post(
    '/{topic_name}/{thread_id}/{message_id}/reply_message',
    [PostController::class, 'replyMessage']
    )->name('reply_message.submit');

Route::get(
    '/{topic_name}/{thread_id}/{message_id}/replies/',
    [PostController::class, 'replies']
    )->name("replies");
