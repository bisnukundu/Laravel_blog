@extends('layouts.app')
@section('main')
<div>
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Form Elements</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group pull-right top_search">
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
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                @if($errors->any())
               <h1 class="text-danger"> {{ implode('', $errors->all('<div>:message</div>')) }}</h1>
                @endif
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Form Design <small>different form elements</small></h2>

                        <div class="clearfix"></div>
                    </div>
                    @if (session()->has('message'))
                    <h3 class="text-danger"> {{session("message")}}</h3>

                    @endif
                    <div class="x_content">
                        <br />
                        <form id="demo-form2" action="/post/{{$post->id}}" enctype="multipart/form-data" method="POST"
                            data-parsley-validate class="form-horizontal form-label-left">
                            @method('PUT')
                            @csrf
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Post Title
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input value="{{$post->title}}" type="text" name="PostTitle" id="first-name"
                                        required="required" class="form-control ">
                                    @error('PostTitle')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Post
                                    Description <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea class="form-control" name="postDecription" id="" cols="30" rows="10">
                                        {{$post->description}}
                                    </textarea>
                                    @error('postDescription')
                                    {{$message}}
                                    @enderror

                                </div>
                            </div>

                            <div class="item form-group text-center ">
                                <label class="col-form-label  col-md-3 col-sm-3 label-align" for="formFile">Post Image
                                    <span class="required">*</span>
                                </label>
                                <input class="" id="formFile" name="postImage" type="file">
                                @error('postImage')
                                <h5 class="text-danger">{{$message}}</h5>
                                @enderror
                            </div>



                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="postCategory">Post
                                    Category <span class="required">*</span>
                                </label>

                                <div class="col-md-6 col-sm-6 ">
                                    <select name="postCategory" class="form-control" id="postCategory">
                                        <option label="Select Category"></option>
                                        @foreach ($categorys as $category)
                                        <option value="{{$category->id}}">{{$category->category_name}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('postCategory')
                                    <h5 class="text-danger">{{$message}}</h5>
                                    @enderror
                                </div>

                            </div>

                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
