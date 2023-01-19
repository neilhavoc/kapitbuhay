@extends('layouts.Vaw')

<!-- Page Title -->
@section('title', 'Vaw Review Distress')

<!-- Styles -->
@section('styles')
<style>

.container-text-center .wrapper {
    position: relative;
    height: 500px;
    width: 75%;
    border-radius: 10px;
    background: #fff;
    border: 2px dashed #c2cdda;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.wrapper .active {
    border: none;
}

.wrapper .image{
    position: absolute;
    height: 100%;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.wrapper img {
    height: 100%;
    width: 100%;
    object-fit: cover;

}
    .profile{
    height: 170x;
    width: 200px;
}
.search {
    margin-top: 1%;
 }
 .bill-header.cs {
  background-color: rgba(37,71,106,0.56);
  color: #fff;
}
</style>
@stop

<!-- Content -->
@section('content')
<div class="container-fluid" style="overflow-y: scroll; overflow-x: hidden; height:560px;">
    <div class="row mt-5">
        <div class="col-md-3">
            <a class="btn btn-secondary" href="vaw_updatehealthmonitoring" role="button">Back</a>
        </div>
        <div class="col-md-auto">
            <h1>
                Victims Health Status Monitoring Day {{$report['monitoring_day']}}
            </h1>
        </div>
    </div>
    <div class="row mt-3 mx-5">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="nav-link active" id="physical-tab" data-bs-toggle="tab" data-bs-target="#physical" type="button" role="tab" aria-controls="physical" aria-selected="true">Physical Health</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="mental-tab" data-bs-toggle="tab" data-bs-target="#mental" type="button" role="tab" aria-controls="mental" aria-selected="false">Mental Health</button>
            </li>
          </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="physical" role="tabpanel" aria-labelledby="physical-tab">
                <textarea class="form-control" name="physicalmonitoring" id="physicalmonitoring" rows="3" disabled>{{$report['physicalmon_details']}}</textarea>
                <div class="container-text-center">
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="wrapper">
                                <div class="image">
                                    <img src="{{$report['physicalmon_image1']}}" alt="Article Image">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="wrapper">
                                <div class="image">
                                    <img src="{{$report['physicalmon_image2']}}" alt="Article Image">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="wrapper">
                                <div class="image">
                                    <img src="{{$report['physicalmon_image3']}}" alt="Article Image">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="mental" role="tabpanel" aria-labelledby="mental-tab">
                <table class="table table-hover table-bordered">
                    <thead class="bill-header cs text-center">
                        <tr>
                            <th id="trs-hd-1" class="col-lg-1">Questions</th>
                            <th id="trs-hd-2" class="col-lg-1">Answers</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($questions == null)

                        @else
                            <tr>
                                <td>1. {{ $questions['question2']}}</td>
                                <td>1. {{ $answers['answer_1']}}</td>
                            </tr>
                            <tr>
                                <td>2. {{ $questions['question3']}}</td>
                                <td>2. {{ $answers['answer_2']}}</td>
                            </tr>
                            <tr>
                                <td>3. {{ $questions['question4']}}</td>
                                <td>3. {{ $answers['answer_3']}}</td>
                            </tr>
                            <tr>
                                <td>4. {{ $questions['question5']}}</td>
                                <td>4. {{ $answers['answer_4']}}</td>
                            </tr>
                            <tr>
                                <td>5. {{ $questions['question6']}}</td>
                                <td>5. {{ $answers['answer_5']}}</td>
                            </tr>
                            <tr>
                                <td>6. {{ $questions['question7']}}</td>
                                <td>6. {{ $answers['answer_6']}}</td>
                            </tr>
                            <tr>
                                <td>7. {{ $questions['question8']}}</td>
                                <td>7. {{ $answers['answer_7']}}</td>
                            </tr>
                            <tr>
                                <td>8. {{ $questions['question9']}}</td>
                                <td>8. {{ $answers['answer_8']}}</td>
                            </tr>
                            <tr>
                                <td>9. {{ $questions['question10']}}</td>
                                <td>9. {{ $answers['answer_9']}}</td>
                            </tr>
                            <tr>
                                <td>10. {{ $questions['question11']}}</td>
                                <td>10. {{ $answers['answer_10']}}</td>
                            </tr>
                            <tr>
                                <td>11. {{ $questions['question12']}}</td>
                                <td>11. {{ $answers['answer_11']}}</td>
                            </tr>
                            <tr>
                                <td>12. {{ $questions['question13']}}</td>
                                <td>12. {{ $answers['answer_12']}}</td>
                            </tr>
                            <tr>
                                <td>13. {{ $questions['question14']}}</td>
                                <td>13. {{ $answers['answer_13']}}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row mx-1 justify-content-evenly">
        <!-- <div class="col-md-auto">
            <div class="row">
                <div class="col-md-auto">
                    Remarks:
                </div>
            </div>
            <div class="row">
                <div class="col-md-auto">
                    <textarea class="form-control" name="remarks" id="remarks" rows="3" required></textarea>
                </div>
            </div>
        </div>-->
        <div class="col-md-auto">
           <!-- <div class="row">
                <div class="col-md-auto">
                    Monitoring Status:
                </div>
            </div>
            <div class="row">
                <div class="col-md-auto">
                    <select class="form-select" name="monstatus" id="monstatus" aria-label="Monitoring selection">
                        <option selected disabled>Ongoing</option>
                        <option value="Closed">Closed</option>
                      </select>
                </div>
            </div>-->
            <div class="row">
                <div class="col-md-auto">
                    Monitored By:
                </div>
            </div>
            <div class="row">
                <div class="col-md-auto">
                    <input name="remarks" id="remarks" type="text" class="form-control align-content-center" value="{{$report['physicalmon_monitoredby']}}" disabled>
                </div>
            </div>
        </div>
    </div>
    <!--<div class="row justify-content-center mt-5">
        <div class="col-md-auto">
            <button type="submit" class="btn btn-danger">Save</button>
        </div>
    </div>-->

</div>
@stop

<!-- Scripts -->
@section('scripts')
@stop
