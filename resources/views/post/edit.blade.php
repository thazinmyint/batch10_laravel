
@extends('template')

@section('content')



  <!-- Main Content -->
  <div class="container">


    <div class="row">
      <div class="card my-4 col-md-6">
          <h5 class="card-header">Categories</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">Web Design</a>
                  </li>
                  <li>
                    <a href="#">HTML</a>
                  </li>
                  <li>
                    <a href="#">Freebies</a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">JavaScript</a>
                  </li>
                  <li>
                    <a href="#">CSS</a>
                  </li>
                  <li>
                    <a href="#">Tutorials</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div>
      <div class="col-lg-8 col-md-6 mx-auto">
        <h1 class="mt-4">Post Edit Form</h1>

         @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
         @endif
        
        <form method="post" action="{{route('post.update',$post->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label>Title:</label>
              <input type="text" name="title" class="form-control" value="{{$post->title}}">
            </div>

            <div class="form-group">
              <label>Photo:</label><span class="text-danger">[ suppored file types:jpeg,png ]</span>
              <input type="file" name="photo" class="form-control" value="">
              <img src="{{asset($post->image)}}" class="img-fluid w-25">
              <input type="hidden" name="oldphoto" value="{{$post->image}}">
            </div>

            
            
           <div class="form-group">
              <label>Content:</label>
              <textarea name="content" class="form-control" value="">
                
                {{$post->body}}
              </textarea>
            </div>

            <div class="form-group">
              <label>Categories:</label>
              <select name="category" class="form-control">
                <option value="">Choose Category</option>

               {-- accept data and loop --}

                @foreach($categories as $row)
                <option value="{{$row->id}}" 
                  @if($row->id == $post->category_id){{'selected'}}
                  @endif
                        >{{$row->name}}</option>
                @endforeach
            </select>
            
            </div>

            <div class="form-group">
             <input type="submit" name="btnsubmit" class="btn btn-primary" value="Update">
            </div>

        </form>


        
      </div>
    </div>
  </div>

  @endsection