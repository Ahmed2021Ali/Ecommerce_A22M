<form action="{{ route('banner.destroy', $banner) }}" method="post"
      class="d-inline">
    @method('delete')
    @csrf
    <h3> هل تريد حذف بانر بالفعل ؟  </h3>
    <button class="btn btn-danger btn-lg btn-block"> نعم</button>
</form>
@include('adminDashboard.layouts.footerSlot')

