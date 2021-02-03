<form class="text-center" id="delete_form"
      action="{{$delete_route}}" method="post" onsubmit="return confirm('Do you really want to delete this?');">
    <a href="{{$edit_route}}"><i
            class="fas fa-edit"></i></a>
    @csrf
    @method("DELETE")
    <button class="btn" type="submit" ><i
            style="color:#cd0a0a" class="fas fa-trash"></i></button>
</form>
