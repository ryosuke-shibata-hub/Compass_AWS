@extends('layouts.login.common')
@section('title','トップページ')
@include('layouts.login.header')
@section('contents')

<label>
  ログインユーザー：{{ Auth::user()->username }}
</label>

<p>
  <a href="{{ route('logout') }}">ログアウト</a>
</p>
@can('admin')
<p><a href="{{ route('postCategory.index') }}">カテゴリーを追加</a></p>
@endcan
<p><a href="{{ route('post.create') }}">投稿</a></p>

<p>
  <label>カテゴリー</label>
  <select id="post_sub_category_search" name="post_sub_category_id">
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
  <label><a href="{{ route('userPostIndex') }}">リセット</a></label>
  <Form action="{{ route('userPostIndex') }}" method="get">
    <input type="text" name="search_keyword">
    <button type="submit">検索</button>
  </Form>
</p>

<Form action="{{ route('userPostIndex') }}" method="get">
  <button type="submit"
          name="post_favorite"
          value="post_favorite">
          いいねした投稿
  </button>
</Form>

<Form action="{{ route('userPostIndex') }}" method="get">
  <button type="submit"
          name="my_post"
          value="my_post">
          自分の投稿
    </button>
</Form>

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
