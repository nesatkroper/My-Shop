<x-layout>
  <div class="row d-flex flex-row container-fluid p-0 m-0">
    @foreach($pro as $row)
    <div class="col-xl-3 col-md-4 col-sm-6 p-0 hover-scale">
      <div class="card m-3 p-0 rounded-4">
        <div
          class="pro-item card-body d-flex flex-column justify-content-center align-items-center text-center shadow rounded-4 px-1"
        >
          <div
            class="circle border border-3 border-primary rounded-circle float-start position-absolute top-0 start-0 m-2 d-none justify-content-center align-items-center"
            style="width: 20px; height: 20px"
          >
            <i class="bi bi-check text-primary fw-bold fs-4"></i>
          </div>
          <img
            src="{{ asset('uploads/product/'.$row->photo) }}"
            alt=""
            class="rounded-4"
            style="height: 100px"
          />

          <p class="m-0 fs-5 fw-bold">{{$row->name}}</p>
          <p class="m-0 fs-5">{{$row->qty}} pcs</p>
          <p class="m-0 fs-5 text-danger">$ {{$row->price}}</p>
          <div
            class="w-100 d-flex flex-row justify-content-around"
            style="height: 30px"
          >
            <form
              action="{{route('pos.show', $row->id)}}"
              method="get"
              class="d-flex flex-row justify-content-around gap-2"
            >
              <div class="d-flex flex-row">
                <a class="btn btn-sm btn-danger p-0 m-0">
                  <i class="bi bi-dash fs-4 fw-bold"></i>
                </a>
                <input
                  type="number"
                  class="form-control text-dark text-center p-0 mx-1"
                  style="width: 30px"
                  name="qty"
                  id=""
                  min="1"
                  value="1"
                />
                <a class="btn btn-sm btn-danger p-0 m-0">
                  <i class="bi bi-plus fs-4 fw-bold"></i>
                </a>
              </div>
              @csrf @method('get')
              <button type="submit" class="btn btn-primary btn-sm px-2 m-0">
                Add to Cart
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</x-layout>
