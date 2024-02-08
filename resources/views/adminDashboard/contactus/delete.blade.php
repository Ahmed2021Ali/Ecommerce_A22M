<form action="{{ route('contact.destroy', $contact) }}" method="post"
      class="d-inline">
    @method('delete')
    @csrf
    <h3> هل تريد حذف  بالفعل ؟  </h3>
    <button class="btn btn-danger btn-lg btn-block"> نعم</button>
</form>
@include('adminDashboard.layouts.footerSlot')

