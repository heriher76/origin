@extends('layouts.app')

@section('title', 'Berita | Origin Magazine Indonesia')

@section('contents')
<div class="col-md-8 text-left">
<div class="row">
  @foreach($news as $item)
  <article class="col-md-12 article-list">
    <div class="inner">
      <figure>
          <a href="{{ url('/'.$item->slug) }}">
            <img src="{{ url('berita/'.$item->thumbnail) }}">
        </a>
      </figure>
      <div class="details">
        <div class="time">{{ $item->updated_at->formatLocalized('%A, %d %B %Y') }}</div>
      
        <h1><a href="{{ url('/'.$item->slug) }}">{{ $item->title }}</a></h1>
        <p>
          {!! str_limit(strip_tags($item->description), $limit = 90, $end = '...') !!}
        </p>
        <footer>
          <a class="btn btn-primary more" href="{{ url('/'.$item->slug) }}">
            <div>Lanjut Baca</div>
            <div><i class="ion-ios-arrow-thin-right"></i></div>
          </a>
        </footer>
      </div>
    </div>
  </article>
  @endforeach
  <div class="col-md-12 text-center">
    {{ $news->links() }}
    <!-- <ul class="pagination">
      <li class="prev"><a href="#"><i class="ion-ios-arrow-left"></i></a></li>
      <li class="active"><a href="#">1</a></li>
      <li><a href="#">2</a></li>
      <li><a href="#">3</a></li>
      <li><a href="#">...</a></li>
      <li><a href="#">97</a></li>
      <li class="next"><a href="#"><i class="ion-ios-arrow-right"></i></a></li>
    </ul>
    <div class="pagination-help-text">
    	Showing 8 results of 776 &mdash; Page 1
    </div> -->
  </div>
</div>
</div>
<div class="col-md-4 sidebar">
<aside>
  <h1 class="aside-title">Berita Terbaru</h1>
  <div class="aside-body">
   @foreach($latestNews as $latest)
    <article class="article-mini">
      <div class="inner">
      <figure>
          <a href="{{ url('/'.$latest->slug) }}">
            <img src="{{ url('berita/'.$latest->thumbnail) }}">
        </a>
      </figure>
      <div class="padding">
        <h1><a href="{{ url('/'.$latest->slug) }}">{{ $latest->title }}</a></h1>
        <div class="time">{{ $latest->created_at->formatLocalized('%A, %d %B %Y') }}</div>
      </div>
      </div>
    </article>
    @endforeach
  </div>
</aside>
</div>
@stop