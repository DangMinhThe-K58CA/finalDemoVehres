<li class="dropdown at-drop" id="notification">
    <input type="hidden" value="{{ Auth::user()->id }}" class="current_user_id">
    <a href="#" class="dropdown-toggle dropdown-at " data-toggle="dropdown"><i class="fa fa-globe" style="color: #2e6da4"></i> <span class="number">{{ count(Auth::user()->unreadNotifications) }}</span></a>
    <ul class="dropdown-menu menu1 " role="menu">
        @foreach (Auth::user()->unreadNotifications->take(5) as $item)
        <li class="list-group-item" style="background-color: #D1F4E6;" data-notif-id="{{ $item->id }}">
            <a href="{{ $item->data['link'] }}" name="notifications">
                <div class="user-new">
                    <p>{{ $item->data['message'] }}</p>
                    <span>{{ $item->created_at->diffForHumans() }}</span>
                </div>
                <div class="user-new-left">
                    <i class="fa fa-info"></i>
                </div>
                <div class="clearfix"></div>
            </a>
        </li>
        @endforeach
        <li><a href="{{ route('notifications.index') }}" class="view">View all notifications</a></li>
    </ul>
</li>
