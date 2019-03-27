<li>
    <a href="{{route('evaluation.evaluate', $notification->data['sub_id'])}}">
        <span class="subject"></span>
        <span class="message">{{$notification->data['first_name']}} {{$notification->data['last_name']}} submitted a resume</span>
    </a>
</li>