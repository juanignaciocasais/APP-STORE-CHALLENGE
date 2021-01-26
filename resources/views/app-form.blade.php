<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <form role="form" method="post" action="" accept-charset="UTF-8" enctype="multipart/form-data">
                {{ csrf_field() }}

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="card-body">

                    <div class="form-group">
                        <label for="app_name">App Name</label>
                        <input type="text" class="form-control" id="app_name" name="app_name" value="">
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category_id" id="category_id">

                            <option> </option>

                        </select>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <label for="price">Price - $USD</label>
                            <input type="number" class="form-control" id="price" name="price" min="0" value="">
                        </div>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label for="image">Select image/file</label>
                        <input type="file" class="form-control" name="image">
                    </div>

                    <input type="hidden" name="app_id" value="{{ $app->app_id }}">

                    <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
</div>