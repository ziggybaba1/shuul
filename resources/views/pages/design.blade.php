@extends('layouts.page')
@section('content')
<section class="probootstrap-section probootstrap-section-colored">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-left section-heading probootstrap-animate">
              <h1></h1>
            </div>
          </div>
        </div>
      </section>
{!!\App\Autosave::first()->content!!}
@endsection