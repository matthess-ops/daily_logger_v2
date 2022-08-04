
@extends('layouts.navbar')

@section('content')
<h4>activity.show.blade</h4>
    {{$activities}}
    {{-- {{route('client.activities-config.delete.mainactivity')}} --}}
    <form action="" method="POST">
        @csrf
        <div class="form-group row">
            <label>Remove main activity</label>
            <select class="form-control" name="mainActivityDelete">
                @foreach ($activities as $activity)
                @if ($activity->type == 'main')
                <option value = "{{$activity->id}}">{{$activity->value}}</option>

                @endif

                @endforeach
            </select>
            <button class="btn btn-primary mt-2" type="submit" >remove</button>

        </div>

    </form>

        {{-- {{route('client.activities-config.delete.mainactivity')}} --}}
        <form action="" method="POST">
            @csrf
            <div class="form-group row">
                <label>Remove scaled activity</label>
                <select class="form-control" name="removeScaled">
                    @foreach ($activities as $activity)
                    @if ($activity->type == 'scaled')
                    <option value = "{{$activity->id}}">{{$activity->value}}</option>

                    @endif

                    @endforeach
                </select>
                <button class="btn btn-primary mt-2" type="submit" >remove</button>

            </div>

        </form>



@endsection

