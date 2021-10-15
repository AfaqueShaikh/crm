
<div class="container">
    <form method="post" enctype="multipart/form-data">


        <label>Import Variants </label>
        <input type="file" name="file" >
        <button type="submit" name="submit">Upload</button>

        
    </form>

    <form method="post" enctype="multipart/form-data" action="{{url('import/products')}}">

        

        <label>Import Product </label>
        <input type="file" name="products_file" >
        <button type="submit" name="submit">Upload</button>
    </form>
</div>

