<x-layout>
  <div class="container-fluid px-4">
    <h2 class="mt-4">Product Category</h2>
    <button
      class="btn btn-success rounded-3 shadow m-3"
      type="button"
      data-bs-toggle="modal"
      data-bs-target="#staticBackdropAdd"
      data-bs-whatever="@mdo"
    >
      Add New Product
    </button>
    <div class="app-content">
      <div class="container-fluid">
        <div class="row">
          <div class="card mb-4">
            <div class="card-header">
              <h3 class="card-title">Bordered Table</h3>
            </div>
            <div class="card-body">
              @if(session('success'))
              <div class="alert alert-success">
                {{ session("success") }}
              </div>
              @endif
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Photo</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($pro as $p)
                  <tr class="text-center">
                    <td>{{$loop->iteration}}</td>
                    <td>
                      <img
                        class="rounded-3"
                        src="{{asset('uploads/product/'.$p->photo)}}"
                        alt=""
                        style="height: 60px"
                      />
                    </td>
                    <td>{{ $p->name }}</td>
                    <td>{{$p->cate}}</td>
                    <td>{{$p->qty}} pcs</td>
                    <td>$ {{$p->price}}</td>
                    @if ($p->status == '0')
                    <td class="text-success border fw-bold">Active</td>
                    @else
                    <td class="text-danger fw-bold">Out of Sale</td>
                    @endif
                    <td
                      class="d-flex flex-lg-row flex-md-column flex-sm-column gap-2"
                    >
                      <button
                        class="btn btn-primary rounded-3"
                        data-bs-toggle="modal"
                        data-bs-target="#addModal-{{ $p->id }}"
                      >
                        Add
                      </button>
                      <button
                        class="btn btn-warning rounded-3"
                        data-bs-toggle="modal"
                        data-bs-target="#editModal-{{ $p->id }}"
                      >
                        Edit
                      </button>
                      <button
                        class="btn btn-danger rounded-3"
                        data-bs-toggle="modal"
                        data-bs-target="#deleteModal-{{ $p->id }}"
                      >
                        Delete
                      </button>
                    </td>
                  </tr>
                  <!-- Add Modal -->
                  <div
                    class="modal fade"
                    id="addModal-{{ $p->id }}"
                    tabindex="-1"
                    aria-labelledby="addModalLabel-{{ $p->id }}"
                    aria-hidden="true"
                  >
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form
                          action="{{ route('pro.add', $p->id) }}"
                          method="POST"
                        >
                          @csrf @method('POST')
                          <div class="modal-header">
                            <h5
                              class="modal-title"
                              id="editModalLabel-{{ $p->id }}"
                            >
                              Add Product
                            </h5>
                            <button
                              type="button"
                              class="btn-close"
                              data-bs-dismiss="modal"
                              aria-label="Close"
                            ></button>
                          </div>
                          <div class="modal-body">
                            <div
                              class="mb-3 d-flex flex-column justify-content-center align-items-center"
                            >
                              <img
                                class="rounded-3"
                                style="height: 200px"
                                src="{{asset('uploads/product/'.$p->photo)}}"
                                alt=""
                              />
                              <span class="fw-bold"
                                >Product Name: {{$p->name}}</span
                              >
                              <span class="fw-bold"
                                >Product Quantity:
                                {{$p->qty}}
                                pcs</span
                              >
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Add Price</label>
                              <input
                                type="text"
                                class="form-control"
                                id="name-{{ $p->id }}"
                                name="price"
                              />
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Add Quantity</label>
                              <input
                                type="text"
                                class="form-control"
                                name="add"
                              />
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button
                              type="button"
                              class="btn btn-secondary"
                              data-bs-dismiss="modal"
                            >
                              Close
                            </button>
                            <button type="submit" class="btn btn-primary">
                              Add Product Quantity
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- Edit Modal -->
                  <div
                    class="modal fade"
                    id="editModal-{{ $p->id }}"
                    tabindex="-1"
                    aria-labelledby="editModalLabel-{{ $p->id }}"
                    aria-hidden="true"
                  >
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form
                          action="{{ route('pro.update', $p->id) }}"
                          method="POST"
                          enctype="multipart/form-data"
                        >
                          @csrf @method('PUT')
                          <div class="modal-header">
                            <h5
                              class="modal-title"
                              id="editModalLabel-{{ $p->id }}"
                            >
                              Edit Product Information
                            </h5>
                            <button
                              type="button"
                              class="btn-close"
                              data-bs-dismiss="modal"
                              aria-label="Close"
                            ></button>
                          </div>
                          <div class="modal-body">
                            <div
                              class="mb-3 d-flex flex-column justify-content-center align-items-center"
                            >
                              <img
                                class="rounded-3"
                                style="height: 200px"
                                src="{{asset('uploads/product/'.$p->photo)}}"
                                alt=""
                              />
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Name</label>
                              <input
                                type="text"
                                class="form-control"
                                id="name-{{ $p->id }}"
                                name="name"
                                value="{{ $p->name }}"
                              />
                            </div>
                            <div class="mb-3">
                              <label class="col-form-label">Price:</label>
                              <input
                                type="text"
                                class="form-control"
                                name="price"
                                value="{{ $p->price }}"
                              />
                            </div>
                            <div class="mb-3">
                              <label class="col-form-label">Category:</label>
                              <select name="cate" id="" class="form-select">
                                <option selected value="{{$p->cate_id}}">
                                  {{$p->cate}}
                                </option>
                                @foreach($cate as $c)
                                <option value="{{$c->id}}">
                                  {{$c->name}}
                                </option>
                                @endforeach
                              </select>
                            </div>
                            <div class="mb-3">
                              <label class="col-form-label">Photo:</label>
                              <input
                                type="file"
                                class="form-control"
                                name="photo"
                              />
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button
                              type="button"
                              class="btn btn-secondary"
                              data-bs-dismiss="modal"
                            >
                              Close
                            </button>
                            <button type="submit" class="btn btn-warning">
                              Update Product
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- Delete Modal -->
                  <div
                    class="modal fade"
                    id="deleteModal-{{ $p->id }}"
                    tabindex="-1"
                    aria-labelledby="deleteModalLabel-{{ $p->id }}"
                    aria-hidden="true"
                  >
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form
                          action="{{ route('pro.destroy', $p->id) }}"
                          method="POST"
                        >
                          @csrf @method('DELETE')
                          <div class="modal-header fs-5 fw-bold">
                            Are you sure want to delete this record?
                          </div>
                          <div class="modal-footer">
                            <button
                              type="button"
                              class="btn btn-secondary"
                              data-bs-dismiss="modal"
                            >
                              Close
                            </button>
                            <button type="submit" class="btn btn-danger">
                              Delete Product
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Add Product -->
  <div
    class="modal fade"
    id="staticBackdropAdd"
    tabindex="-1"
    aria-labelledby="staticBackdropLabel"
    aria-hidden="true"
    data-bs-target="#staticBackdropAdd"
    data-bs-backdrop="static"
    data-bs-keyboard="false"
  >
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">
            Add New Product
          </h1>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        <div class="modal-body">
          <form
            action="{{ route('pro.store') }}"
            method="POST"
            enctype="multipart/form-data"
          >
            @csrf
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label"
                >Product Name:</label
              >
              <input type="text" class="form-control" name="name" />
            </div>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Price:</label>
              <input type="text" class="form-control" name="price" />
            </div>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label"
                >Category:</label
              >
              <select name="cate" id="" class="form-select">
                @foreach($cate as $c)
                <option value="{{$c->id}}">
                  {{$c->name}}
                </option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="recipient-name" class="col-form-label">Photo:</label>
              <input type="file" class="form-control" name="photo" />
            </div>
            <input type="submit" name="submit" id="" class="btn btn-success" />
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Close
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-layout>
