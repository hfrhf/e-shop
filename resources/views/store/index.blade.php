@extends('base')
@section('title','Store')

<style>
    .table th, .table td {
        vertical-align: middle;
    }
    .table img {
        display: block;
        margin: auto;
        max-width: 100px;
        max-height: 100px;
    }
    .table-container {
        margin-top: 50px;
    }
    .table-description {
        max-width: 300px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>


@section('content')
<div class="landing">
    <div class="hero">
        <div class="hero-text">
            <h1 class="text-center">E shop</h1>
            <p class="">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laborum velit, quae iusto sapiente totam alias.</p>
        </div>
    </div>
</div>




<div class="container mt-15">
   <div class="row ">
    <div class="filter col-12 col-md-2">
        <h3>Filters</h3>
        <form  method="get" >
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input
                    type="text"
                    name="name"
                    id="name"
                    class="form-control"
                    placeholder="Name or Description ..."
                    aria-describedby="helpId"
                    value="{{Request::input('name')}}"
                />
                
            </div>
            <h5>category</h5>
               
            
                
                    
                    @foreach ($categories as $category)
                    <div class="form-check mb-3">
                        @php
                            if(Request::input('categories') !==null){
                                $chaked=in_array($category->id,Request::input('categories'));
                            }else{
                                $chaked=[];
                            }
                        @endphp
                  
                    
                   
                        
                   
                    <input @checked($chaked) value="{{$category->id}}"  type="checkbox" name="categories[]" class="form-check-input" />
                    
                    <label class="form-check-label">{{$category->name}}</label>
                </div>
                    
                        
                    @endforeach
               <div class="min-max">
                <div class="mb-3">
                    <label for="" class="form-label">Max</label>
                    <input
                        type="number"
                        name="max"
                        id="max"
                        class="form-control"
                        placeholder="Max Price .."
                        aria-describedby="helpId"
                        value="{{Request::input('max')}}"
                        min="0"
                    />
                    
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Min</label>
                    <input
                        type="number"
                        name="min"
                        min="0"
                        id="min"
                        class="form-control"
                        placeholder="min Price .."
                        aria-describedby="helpId"
                        value="{{Request::input('min')}}"
                    />
                    
                </div>
               </div>
                

                
                
            
            <input type="submit" class="btn btn-success" value="Filter" />
        </form>

        

    </div>
    <div class=" col-12 col-md-10 ">
        <div class="row gap-5 ">
            @foreach ($products as $product)
        
            <div class="card" style="width: 15rem;">
        
        
                <img class="card-img-top"  src={{asset('storage/'.$product->image)}} alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">{{$product->name}}</h5>
                  <p class="card-text">{{Str::limit($product->description,50)}}</p>
        
                  <div class="d-flex justify-content-between">
                    <span>Quantity: <span class="badge bg-success">{{$product->quantity}}</span></span>
                    <span>Price: <span class="badge bg-primary">{{$product->price}} $</span></span>
                    
        
                  </div>
        
                </div>
                <a class="btn btn-dark" href={{route('store.show',$product->id)}} >Show More</a>
                <div class="card-footer">
                    
                    {{date_format($product->created_at,'Y-m-d')}}
        
        
                </div>
              </div>
        
        
            @endforeach
        
        </div>
        
        
                </tbody>
            </table>
        
    </div>
   </div>
</div>





@endsection

