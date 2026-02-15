<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\TopicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TopicController::class, 'index'])->name("home");

Route::get(
    '/topic/{topic}', [TopicController::class, 'topic']
    )->name("topic");

Route::post(
    '/addTopic', [TopicController::class, 'addTopic']
    )->name("addTopic");


Route::get(
    '/topic/{topic}/thread/{thread}',[PostController::class, 'thread']
    )->name("thread")->scopeBindings();

Route::post(
    '/topic/{topic}/addThread', [PostController::class, 'addThread']
    )->name("addThread");

Route::post(
    '/topic/{topic}/thread/{thread}/addMessage',
    [PostController::class, 'addMessege']
    )->name("addMessage")->scopeBindings();

Route::get(
    '/topic/{topic}/thread/{thread}/message/{message}/replyMessage',
    [PostController::class, 'showReplyForm']
    )->name("replyMessage.form")->scopeBindings();

 Route::post(
    '/topic/{topic}/thread/{thread}/message/{message}/replyMessage',
    [PostController::class, 'replyMessage']
    )->name('replyMessage.submit')->scopeBindings();

Route::get(
    '/topic/{topic}/thread/{thread}/message/{message}/replies/',
    [PostController::class, 'replies']
    )->name("replies")->scopeBindings();
