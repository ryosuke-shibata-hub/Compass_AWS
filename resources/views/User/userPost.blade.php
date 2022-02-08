@extends('layouts.login.common')
@section('title','トップページ')
@include('layouts.login.header')
@section('contents')

@can('admin')
<p class="create_category">
<a type="btn" class="btn category-btn" href="{{ route('postCategory.index') }}">カテゴリーを追加</a>
</p>
@endcan
<p class="create_category">
<a type="btn" class="btn post-btn" href="{{ route('post.create') }}">投稿</a>
</p>


<Form action="{{ route('userPostIndex') }}" method="get">
  <button class="btn my_post_btn"
          type="submit"
          name="my_post"
          value="my_post">
          自分の投稿
    </button>
</Form>

<Form action="{{ route('userPostIndex') }}" method="get">
  <button class="btn my_post_favorite_btn"
          type="submit"
          name="post_favorite"
          value="post_favorite">
          いいねした投稿
  </button>
</Form>

<Form action="{{ route('userPostIndex') }}" method="get">
  <input class="search_form" type="text" name="search_keyword"
          placeholder="キーワードを検索">
  <button class="btn search_btn"
          type="submit"
          >検索</button>
</Form>



<p>
  <label class="category_title">カテゴリー</label>
  <select class="post_sub_category_search"
          id="post_sub_category_search" name="post_sub_category_id">
    <option value="">-----------------------------</option>
    @foreach($postMainCategoryList as $postMainCategoryList)
      <optgroup label="{{ $postMainCategoryList->main_category }}">
        @foreach($postMainCategoryList->postSubCategory as $postSubCategory)
        <option
          value="{{ $postSubCategory->id }}"
          data-subcategory_id="{{ $postSubCategory->id }}">
          {{ $postSubCategory->sub_category }}
        </option>
        @endforeach
      </optgroup>
    @endforeach
  </select>
  <label>
    <a type="btn" class="btn category_reset_btn"href="{{ route('userPostIndex') }}">リセット</a></label>
</p>

@foreach($posts_lists as $post_list)
  <ul>
    <li>{{ $post_list->user->username }}</li>
    <li>{{ $post_list->event_at }}</li>
    <li>閲覧数:{{ $post_list->ActionLog->count() }}view</li>
    <li>{{ $post_list->title }}</li>
    <li>{{ $post_list->postSubCategory->sub_category }}</li>
    <li>いいね数:{{ $post_list->userPostFavoriteRelation->count() }}</li>
    <li>コメント数:{{ $post_list->postComments->count() }}</li>
    <li><a href="{{ route('post_show',[$post_list->id]) }}">
    詳細ページ</a></li>
  </ul>
@endforeach
@endsection
@include('layouts.login.footer')
