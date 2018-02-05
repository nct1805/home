@if(isset($breadcrumb))
<ol class="breadcrumb">
    <li><a href="{{ route('Bk_Home_Index') }}"><i class="fa fa-dashboard"></i> DashBoard</a></li>
    @foreach($breadcrumb as $link)
        <li><a href="{{ $link['url'] }}">{{ $link['label'] }}</a></li>
    @endforeach
</ol>
@endif