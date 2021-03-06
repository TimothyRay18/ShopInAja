@extends('layouts.app')

@section('title', 'Detail |')

@section('content')
    <div class="container animate__animated animate__fadeIn">
        <div class="columns">
            <div class="column is-12">
                <div class="column is-12">
                    <form action="{{ route('product.delete', $product['product_id']) }}" method="post">
                    @method('delete')
                    @csrf
                        <input type="hidden" name="product_id" value=$product[product_id]>
                        <a class="button is-primary hvr-backward" href="{{ route('product.all') }}">
                            <span class="icon">
                                <i class="fi-xnslxl-chevron-solid"></i>
                            </span>
                            <b style="color: white;">Back</b>
                        </a>
                        <a class="button is-warning hvr-push" href="{{ route('product.edit', ['product_id' => $product['product_id']]) }}">
                            <span class="icon">
                                <i class="fi-xnsuxl-edit-solid"></i>
                            </span>
                            <b style="color: white;">Edit</b>
                        </a>
                        <button type='submit' class="button is-danger hvr-buzz" onclick="return confirm('Are you sure?')">
                            <span class="icon">
                                <i class="fi-xnsuxl-trash-bin"></i>
                            </span>
                            <b style="color: white;">Delete</b>
                        </button>
                    </form>
                </div>
                <div class="columns">
                    <div class="column is-4">
                        <div class="container box">
                            <figure class="image is-4by5 is-480x600">
                            <img src="{{ $product['image'] }}">
                            </figure>
                        </div>
                    </div>
                    <div class="column is-8">
                        <div class="container box">
                            <div class="heading">
                                <h1 class="title">{{ $product['name'] }}</h1>
                            </div>
                            <section class="">
                                <table class="table is-striped">
                                    <tr>
                                        <td width="30%">Name</td>
                                        <td>: {{ $product['name'] }}</td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Product Id</td>
                                        <td>: {{ $product['product_id'] }}</td>
                                    </tr>
                                </table>
                                <hr>
                                <table class="table is-striped">
                                    @foreach($product as $key => $value)
                                    @if ($key != 'image' && $key != 'name' && $key != 'product_id')
                                    <tr>
                                        <td width="30%">{{ ucwords(str_replace('_', ' ', $key)) }}</td>
                                        <td>: {{ $value }}</td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    <tr>
                                        <td width="30%">Tags</td>
                                        <td>: 
                                            @foreach($tags as $tag)
                                            <span class="tag">
                                                {{ $tag }}
                                            </span>
                                            @endforeach
                                        </td>
                                    </tr>
                                </table>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection