@extends("layouts.master")

@section("assets_header")
    {!! Html::style('css/main.css') !!}
@endsection

@section("content")
    <div class="container">
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
                <div class="input-group">
                    <div class="input-group-btn search-panel">
                        <input type="text" name="query" class="form-control" style="width: 90%;" autofocus="true"
                               placeholder="Search something fun...">
                        <span class="input-group-btn">
                        <button class="btn btn-default" value="Search" id="search_button" type="button">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                   </span>
                    </div>
                </div>
            </div>
        </div>
    <hr/>
    <ul class="list-unstyled video-list-thumbs row"></ul>
@endsection

@section('post-script')
    <script type="text/javascript">

        $(document).ready(function(e){

            $('#search_button').click(function(e){
                var query  = $("[name='query']").val(),
                    box = $('.video-list-thumbs');

               $.get('/search_item/'+query, function(data){

                    $.each(data.videos.items, function(i, v){

                        var title_   = v.snippet.title,
                            url      = v.snippet.thumbnails.medium.url,
                            videoId  = v.id.videoId;

                       var  html  = '<li class="col-lg-3 col-sm-4 col-xs-6">';
                            html += '<img src='+url+' alt="'+title_+'" class="img-responsive" height="130px"/>';
                            html += '<h2 class="truncate">'+title_+'</h2>';
                            html += '<span class="glyphicon glyphicon-play-circle"></span>';
                            html += '</li>'
                        box.append(html);
                    })
                });
          })
        });

    </script>
@endsection