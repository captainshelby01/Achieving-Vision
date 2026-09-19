<?php

namespace App\Filament\Widgets;

use App\Models\Comment;
use App\Models\Event;
use App\Models\Post;
use App\Models\Subscriber;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverviewWidget extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $publishedPosts = Post::published()->count();
        $totalSubscribers = Subscriber::where('is_subscribed', true)->count();
        $pendingComments = Comment::pending()->count();
        $upcomingEvents = Event::upcoming()->count();

        return [
            Stat::make('Published Articles', $publishedPosts)
                ->description('Live on the platform')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('primary'),

            Stat::make('The Inner Circle', $totalSubscribers)
                ->description('Active newsletter subscribers')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('success'),

            Stat::make('Pending Comments', $pendingComments)
                ->description($pendingComments > 0 ? 'Requires your moderation' : 'All caught up')
                ->descriptionIcon('heroicon-m-chat-bubble-bottom-center-text')
                ->color($pendingComments > 0 ? 'warning' : 'gray'),

            Stat::make('Upcoming Events', $upcomingEvents)
                ->description('Scheduled masterclasses & talks')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('info'),
        ];
    }
}