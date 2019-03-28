<form action="{{route('search')}}" method="POST" role="search" id="searchForm">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="q"
               placeholder="Search Hotels"> <span class="input-group-btn">
					<button type="submit" class="btn btn-default">
						<span class="fa fa-search"></span>
					</button>
				</span>
    </div>
</form>
