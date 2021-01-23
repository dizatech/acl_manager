@component('panel.layouts.component', ['title' => 'دسترسی‌ها'])

    @slot('style')
    @endslot

    @slot('subject')
        <h1><i class="fa fa-users"></i> دسترسی‌ها </h1>
        <p>لیست دسترسی‌های تعریف شده برای مدیریت سطوح دسترسی.</p>
    @endslot

    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="{{ route('roles-assignment.index') }}">سطوح دسترسی</a></li>
        <li class="breadcrumb-item">دسترسی‌ها</li>
    @endslot

    @slot('content')
        <div class="row">
            <div class="col-md-12">
                @component('components.collapse-card', ['title' => 'لیست دسترسی‌ها'])
                    @slot('body')
                        @component('components.collapse-search')
                            @slot('form')
                                <form class="clearfix">
                                    <div class="form-group">
                                        <label for="text-name-input">نام کاربر</label>
                                        <input type="text" class="form-control" id="text-name-input" placeholder="نام کاربر">
                                    </div>
                                    <button type="submit" class="btn btn-primary float-left">جستجو</button>
                                </form>
                            @endslot
                        @endcomponent

                        <div class="mt-4">
                            <a href={{ route('permissions.create') }} type="button" class="btn btn-primary"><i class="fa fa-plus"></i> ایجاد دسترسی</a>
                        </div>

                        @component('components.table')
                            @slot('thead')
                                <tr>
                                    <th>شناسه</th>
                                    <th>نام</th>
                                    <th>برچسب</th>
                                    <th>توضیحات</th>
                                    <th>فعالیت</th>
                                </tr>
                            @endslot
                            @slot('tbody')
                                @forelse ($permissions as $permission)
                                    <tr>
                                        <td>
                                            {{$permission->id}}
                                        </td>
                                        <td>
                                            {{$permission->name}}
                                        </td>
                                        <td>
                                            {{$permission->display_name}}
                                        </td>
                                        <td>
                                            {{$permission->description}}
                                        </td>
                                        <td class="d-flex">
                                            <a href="{{route('permissions.edit', $permission->id)}}"
                                               class="btn btn-sm btn-primary mr-2">ویرایش</a>
                                            <form
                                                action="{{route('permissions.destroy', $permission->id)}}"
                                                method="POST"
                                                onsubmit="return confirm('آیا مطمئن هستید؟');"
                                            >
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">موردی برای نمایش وجود ندارد.</td>
                                    </tr>
                                @endforelse
                            @endslot
                        @endcomponent

                        {{--Paginate section--}}
                        {{ $permissions->links() }}
                    @endslot
                @endcomponent
            </div>
        </div>


    @endslot

    @slot('script')
    @endslot

@endcomponent
