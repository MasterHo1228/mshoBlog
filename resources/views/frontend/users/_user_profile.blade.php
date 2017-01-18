<div class="row">
    <div class="profile">
        <div class="avatar">
            <img src="{{ $user->gravatar('140') }}" alt="Circle Image" class="img-circle img-responsive img-raised">
        </div>
        <div class="name">
            <h3 class="title">{{ $user->name }}</h3>
            @if($user->is_admin=='1')
                <h6 style="font-weight: bold; color: #55b559">管理员</h6>
            @endif
        </div>
    </div>
</div>
<div class="description text-center">
    <p>{{ $user->description }}</p>
</div>