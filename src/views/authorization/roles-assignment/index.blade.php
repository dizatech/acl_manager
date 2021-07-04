@component('panel.layouts.component', ['title' => 'کاربران'])

    @slot('style')
    @endslot

    @slot('subject')
        <h1><i class="fa fa-users"></i> کاربران </h1>
        <p>مدیریت سطوح دسترسی کاربران، اعطای دسترسی و نقش به کاربران.</p>
    @endslot

    @slot('breadcrumb')
        <li class="breadcrumb-item"> لیست کاربران </li>
    @endslot

    @slot('content')
        <div class="row">
            <div class="col-md-12">
                @component('components.accordion')
                    @slot('cards')
                        @component('components.collapse-card', ['id' => 'role_assignment_index', 'show' => 'show', 'title' => 'لیست کاربران'])
                            @slot('body')
                                @component('components.collapse-search')
                                    @slot('form')
                                        <form class="clearfix">
                                            <div class="form-group">
                                                <label for="text-name-input">اطلاعات کاربر</label>
                                                <input type="text" class="form-control" id="text-name-input" name="keyword" value="{{request('keyword')}}" placeholder="نام کاربر، نام کاربری، ایمیل، شماره ملی، شماره تلفن، شهر، آدرس، کدپستی">
                                            </div>
                                            <button type="submit" class="btn btn-primary float-left">جستجو</button>
                                        </form>
                                    @endslot
                                @endcomponent

                                <div class="mt-4">
                                    <a href={{ route('users.create') }} type="button" class="btn btn-primary"><i class="fa fa-plus"></i> ایجاد کاربر</a>
                                </div>

                                @component('components.table')
                                    @slot('thead')
                                        <tr>
                                            <th>شناسه</th>
                                            <th>نام</th>
                                            <th>نام خانوادگی</th>
                                            <th>موبایل</th>
                                            <th>ایمیل</th>
                                            <th># نقش‌ها</th>
                                            <th>فعالیت</th>
                                        </tr>
                                    @endslot
                                    @slot('tbody')
                                        @forelse ($users as $user)
                                            <tr>
                                                <td>
                                                    {{$user->getKey()}}
                                                </td>
                                                <td>
                                                    {{$user->first_name ?? '-'}}
                                                </td>
                                                <td>
                                                    {{$user->last_name ?? '-'}}
                                                </td>
                                                <td>
                                                    {{digitsToEastern($user->mobile) ?? '-'}}
                                                </td>
                                                <td>
                                                    {{$user->email ?? '-'}}
                                                </td>
                                                <td>
                                                    {{ count($user->roles) > 0 ? implode(',',$user->roles->pluck('display_name')->toArray()) : '-' }}
                                                </td>
                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            فعالیت
                                                        </a>

                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a class="dropdown-item" href="{{route('roles-assignment.edit', ['roles_assignment' => $user->id, 'model' => $modelKey])}}">ویرایش دسترسی</a>
                                                            <a class="dropdown-item" href="{{route('users.edit', $user->id)}}">ویرایش اطلاعات</a>
                                                            <a class="dropdown-item" href="{{route('user.reset_password', ['user' => $user->id])}}">ویرایش رمز عبور</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center">موردی برای نمایش وجود ندارد.</td>
                                            </tr>
                                        @endforelse
                                    @endslot
                                @endcomponent

                                {{--Paginate section--}}
                                @if ($modelKey)
                                    {{ $users->withQueryString()->links() }}
                                @endif
                            @endslot
                        @endcomponent
                    @endslot
                @endcomponent
            </div>
        </div>
    @endslot

    @slot('script')
    @endslot

@endcomponent
