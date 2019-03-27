<template>
    <li id="header_inbox_bar" class="dropdown">
    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
        <i class="fa fa-envelope-o"></i>
        <span class="badge bg-theme">{{unreadNotifications.length}}</span>
    </a>
    <ul class="dropdown-menu extended inbox">
        <div class="notify-arrow notify-arrow-green"></div>
        <li>
            <p class="green">Notifications</p>
        </li>
        <!-- <notification-item v-for></notification-item> -->
        <!-- @forelse(auth()->user()->unreadNotifications as $notification)
        @include('layouts.partials.submission')
        @empty -->
        <li>
            <!-- <a href="#">
                <span class="subject"></span>
                <span class="message">No Notifications</span>
            </a> -->
        </li>
        <!-- @endforelse -->
    </ul>
    </li>
</template>

<script>
    export default {
        props:['unreads','userid'],
        data(){
            return{
                unreadNotifications:this.unreads
            }
        },
        mounted() {
            console.log('Component mounted.');
            Echo.private('App.User.${userid}')
    .notification((notification) => {
        console.log(notification.type);

        let newUnreadNotifications = {data:{thread:notification.thread,user:notification.user}};
        this.unreadNotifications.push(newUnreadNotifications);
    });
        }
    }
</script>
