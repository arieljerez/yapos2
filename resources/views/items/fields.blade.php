<div class="row">
  <!-- Upc Ean Isbn Field -->
  <div class="form-group col-md-3">
      <label for="upc_ean_isbn">Upc Ean Isbn:</label>
      <input type="text" name="upc_ean_isbn" id="upc_ean_isbn" class="form-control" value="{{ old('upc_ean_isbn',(isset($item->upc_ean_isbn) ? $item->upc_ean_isbn: ''))}}"/>
  </div>
  <!-- Name Field -->
  <div class="form-group col-md-4">
      <label for="name">Name:</label>
      <input type="text" name="name" id="name" class="form-control" value="{{ old('name',(isset($item->name) ? $item->name: ''))}}"/>
  </div>
  <!-- Description Field -->
  <div class="form-group col-md-5">
      <label for="description">Description:</label>
      <input type="text" name="description" id="description" class="form-control"   value="{{ old('name',(isset($item->description) ? $item->description: ''))}}"/>
  </div>
</div>

<div class="row">
  <div class="col-xs-3 col-md-3">
    <!-- Avatar Field -->
    <div class="form-group">
        <label for="avatar">Avatar:</label>
        <input type="text" name="avatar" id="avatar" class="form-control" value="{{ old('name',(isset($item->avatar) ? $item->avatar: ''))}}" />
    </div>

    <!-- Type Field -->
    <div class="form-group">

        <label class="checkbox-inline">
          <label for="is_item_kit">Is Item Kit:</label>
          <label for="is_item_kit">Yes:</label>
          <input type="radio" name="is_item_kit" id="is_item_kit" value="1" {{ (isset($item->is_item_kit) && $item->is_item_kit == 1)  ? "checked": "" }} />
          <label for="is_item_kit">No:</label>
          <input type="radio" name="is_item_kit" id="is_item_kit" value="0" {{ (isset($item->is_item_kit) && $item->is_item_kit == 0)  ? "checked": '' }}/>
        </label>
    </div>

    <!-- Stock Type Field -->
    <div class="form-group">
      <label for="is_stockeable">Stock Type:</label>
      <label class="checkbox-inline">
          <label for="is_stockeable">Stockeable:</label>
          @isset ($item)
            <input type="radio" name="is_stockeable" id="is_stockeable" value="1" {{ $item->is_stockeable == 1 ? "checked": '' }} />
            <label for="is_stockeable">Unstockeable:</label>
            <input type="radio" name="is_stockeable" id="is_stockeable" value="0" {{ $item->is_stockeable == 0 ? "checked": '' }}/>
          @else
            <input type="radio" name="is_stockeable" id="is_stockeable" value="1" />
            <label for="is_stockeable">Unstockeable:</label>
            <input type="radio" name="is_stockeable" id="is_stockeable" value="0" />
          @endisset
      </label>
    </div>

  </div>
  <div class="col-xs-4 col-md-4">
    <!-- Cost Price Field -->
    <div class="form-group">
      <label for="cost_price">cost_price:</label>
      <input type="number" name="cost_price" id="cost_price" class="form-control" value="{{ old('name',(isset($item->cost_price) ? $item->cost_price: ''))}}"/>
    </div>

    <!-- Selling Price Field -->
    <div class="form-group">
      <label for="selling_price">selling_price:</label>
      <input type="number" name="selling_price" id="selling_price" class="form-control" value="{{ old('name',(isset($item->selling_price) ? $item->selling_price: ''))}}" />
    </div>

    <!-- Quantity Field -->
    <div class="form-group">
      <label for="quantity">quantity:</label>
      <input type="number" name="quantity" id="quantity" class="form-control" value="{{ old('name',(isset($item->quantity) ? $item->quantity: ''))}}"/>
    </div>

  </div>
  <div class="col-xs-4 col-md-4">
    <!-- Reorder Level Field -->
    <div class="form-group">
      <label for="reorder_level">reorder_level:</label>
      <input type="number" name="reorder_level" id="reorder_level" class="form-control" value="{{old('reorder_level',$item->reorder_level)}}"/>
    </div>

    <!-- Receiving Quantity Field -->
    <div class="form-group">
      <label for="receiving_quantity">receiving_quantity:</label>
      <input type="number" name="receiving_quantity" id="receiving_quantity" class="form-control" value="{{old('receiving_quantity',$item->receiving_quantity)}}"/>
    </div>

  </div>
</div>





<!-- Submit Field -->
<div class="form-group col-sm-12">
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{!! route('items.index') !!}" class="btn btn-default">Cancel</a>
</div>
