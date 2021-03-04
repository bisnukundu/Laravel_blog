<div>
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Posts Manage Page</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>


        <div class="clearfix"></div>
        <div class="row" style="display: block;">
            <div class="col-md-12 col-lg-12">
                <div class="x_panel">

                    <div class="x_title">
                        <h2>Posts Manage <small>Hear You Can Manage All Post</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @if (session()->has("message"))
                        <h3>{{session("message")}}</h3>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Category Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $sn=1;
                                @endphp
                                @foreach ($categorys as $category)
                                <tr>
                                    <th scope="row">{{$sn++}}</th>
                                    <td><button class="btn bg-none"
                                            wire:click="category_post({{$category->id}})">{{$category->category_name}}</button>
                                    </td>
                                    <td>
                                        <div class="btn-group">
                                            <button class="btn btn-primary">Edit</button>
                                            <button wire:click="deleteCategory({{$category->id}})"
                                                class="btn btn-danger">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$categorys->links('pagination::bootstrap-4')}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
