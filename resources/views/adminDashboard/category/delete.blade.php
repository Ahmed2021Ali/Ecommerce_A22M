<form action="{{ route('category.destroy', $category) }}" method="post" class="d-inline">
    @method('delete')
    @csrf
    <h3> هل تريد حذف القسم بالفعل ؟  </h3>
    <button class="btn btn-danger btn-lg btn-block"> نعم</button>
</form>
@include('adminDashboard.layouts.footerSlot')

