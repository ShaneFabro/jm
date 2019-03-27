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
        <li v-for="unreadNotification in unreadNotifications">
            <a :href="'/counselor/evaluation/evaluate/' + unreadNotification.data.sub_id">
                <span class="subject"></span>
                <span class="message">{{ unreadNotification.data.first_name }} {{ unreadNotification.data.last_name }} submitted a resume</span>
            </a>
        </li>
    </ul>
    </li>
</template>

<script>
    export default {
        props:[
            'unreads',
            'userid',
        ],
        data(){
            return {
                unreadNotifications: this.unreads,
            }
        },
        mounted() {
            console.log('Component mounted.');
            Echo.private(`App.User.${this.userid}`)
                .notification((notification) => {
                    console.log(notification);

                    let newUnreadNotifications = {
                        data: {
                            ...notification,
                        }
                    };
                    this.unreadNotifications.unshift(newUnreadNotifications);
                });
        }
    }
</script>
