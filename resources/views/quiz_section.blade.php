@extends('app')

@section('title', __('Quiz'))

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12 pull-right">
                <div class="btn-toolbar float-right" role="toolbar">
                    <a href="{{ route('employe-index') }}" class="btn btn-success" title="Back">Back</a>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <a href="javascript:void(0);" id="firstQuizClick" class="btn btn-success" title="Start Quiz">Start Quiz</a>

                <div class="firstDivForQuiz text-center mt-4" style="display: none;">
                    <div class="row m-auto">
                        <h2 class="number mr-3">0 :- </h2>
                        <h2 class="number_1">0</h2>
                        <h2 class="operator">+</h2>
                        <h2 class="number_2">0</h2>
                        <h2 class="equal">&nbsp;=</h2>
                        <input type="number" value="" class="form-control col-md-4 ml-4 candidate_answer" name="candidate_answer" required>
                    </div>

                    <div><button class="btn btn-primary myFunNext">Next</button></div>
                </div>

                <br>
                <button class="btn btn-primary myFunNextSubmit float-right" style="display: none;">Submit</button>
                <div class="table-responsive tableShowData" style="display: none;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Question</th>
                                <th>Correct Answer</th>
                                <th>Your Answer</th>
                                <th>Answer</th>
                            </tr>
                        </thead>
                        <tbody class="answerData"></tbody>
                    </table>
                </div>
            </div>

            <div class="col-md-6">
                <a href="javascript:void(0);" id="secondQuizClick" class="btn btn-success" title="second Start Quiz">Second Start Quiz</a>

                <div class="secondDivForQuiz text-center mt-4" style="display: none;">
                    <div class="row m-auto">
                        <h2 class="second_number mr-3">0 :- </h2>
                        <h2 class="second_number_1">0</h2>
                        <h2 class="second_operator">+</h2>
                        <h2 class="second_number_2">0</h2>
                        <h2 class="second_equal">&nbsp;=</h2>
                        <input type="number" value="" class="form-control col-md-4 ml-4 second_candidate_answer" name="candidate_answer" required>
                    </div>

                    <div><button class="btn btn-primary mySecondFunNext">Next</button></div>
                </div>

                <br>
                <button class="btn btn-primary mySecondFunNextSubmit float-right" style="display: none;">Submit</button>
                <div class="table-responsive secondtableShowData" style="display: none;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Question</th>
                                <th>Correct Answer</th>
                                <th>Your Answer</th>
                                <th>Answer</th>
                            </tr>
                        </thead>
                        <tbody class="secondAnswerData"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        var question = [];
        var secondQuiz = [];

        const minValue = 1;
        const maxValue = 10;
        const maxQuestion = 5;
        const opts = ["+", "-", "*", "/"];

        $(document).on('click', '#firstQuizClick', function(e) {
            $('#firstQuizClick').hide();
            $('.firstDivForQuiz').show();
            myFunNext();
        });

        $(document).on('click', '.myFunNext', function(e) {
            myFunNext();
        });

        function myFunNext() {
            var number_1 = randomInteger(minValue, maxValue);
            var number_2 = randomInteger(minValue, maxValue);
            var opers = Math.floor(Math.random() * opts.length);
            var operator = opts[opers];

            if (question.length >= maxQuestion) {
                $('.firstDivForQuiz').hide();
                $('.myFunNextSubmit').show();
                return false;
            }

            var res = switchCase(opers, number_1, number_2);
            var array = question.push({
                number_1: number_1,
                number_2: number_2,
                operator: operator,
                correct_answer: res,
                candidate_answer: null
            });

            $('.number').text(array + " :- ");
            $('.number_1').text(number_1);
            $('.number_2').text(number_2);
            $('.operator').text(operator);

            var correct_answer = $('.candidate_answer').val();

            if ((array - 2) != -1) {
                question[array - 2].candidate_answer = parseInt(correct_answer);
            }

            // if (correct_answer.length > 0) {
            //     console.log(correct_answer);
            // } else {
            //     alert('Answer is required.');
            //     return false;
            // }

            $('.candidate_answer').val('');

            console.log(number_1, operator, number_2, res, question);
        }

        $(document).on('click', '.myFunNextSubmit', function(e) {
            var html = '';

            $('.myFunNextSubmit').hide();
            $('.tableShowData').show();

            $.each(question, function(key, value) {
                let no = key + 1;

                if (value.correct_answer == value.candidate_answer) {
                    var ans = "Right";
                } else {
                    var ans = "Wrong";
                }

                html += "<tr><th>" + no + "" +
                    "</th><th>" + value.number_1 + value.operator + value.number_2 + "</th><th>" + value.correct_answer + "</th><th>" + value.candidate_answer + "</th><th>" + ans + "</th></tr>";
            });
            $('.answerData').html(html);
        });



        $(document).on('click', '#secondQuizClick', function(e) {
            $('#secondQuizClick').hide();
            $('.secondDivForQuiz').show();
            mySecondFunNext();
        });

        $(document).on('click', '.mySecondFunNext', function(e) {
            mySecondFunNext();
        });

        function mySecondFunNext() {
            var number_1 = randomInteger(minValue, maxValue);
            var number_2 = randomInteger(minValue, maxValue);
            var opers = Math.floor(Math.random() * opts.length);
            var operator = opts[opers];

            if (secondQuiz.length >= maxQuestion) {
                $('.secondDivForQuiz').hide();
                $('.mySecondFunNextSubmit').show();
                return false;
            }

            var res = switchCase(opers, number_1, number_2);
            var array = secondQuiz.push({
                number_1: number_1,
                number_2: number_2,
                operator: operator,
                correct_answer: res,
                candidate_answer: null
            });

            $('.second_number').text(array + " :- ");
            $('.second_number_1').text(number_1);
            $('.second_number_2').text(number_2);
            $('.second_operator').text(operator);

            var correct_answer = $('.second_candidate_answer').val();

            if ((array - 2) != -1) {
                secondQuiz[array - 2].candidate_answer = parseInt(correct_answer);
            }

            $('.second_candidate_answer').val('');
            console.log(number_1, operator, number_2, res, secondQuiz);
        }

        $(document).on('click', '.mySecondFunNextSubmit', function(e) {
            var html = '';

            $('.mySecondFunNextSubmit').hide();
            $('.secondtableShowData').show();

            $.each(secondQuiz, function(key, value) {
                let no = key + 1;

                if (value.correct_answer == value.candidate_answer) {
                    var ans = "Right";
                } else {
                    var ans = "Wrong";
                }

                html += "<tr><th>" + no + "" +
                    "</th><th>" + value.number_1 + value.operator + value.number_2 + "</th><th>" + value.correct_answer + "</th><th>" + value.candidate_answer + "</th><th>" + ans + "</th></tr>";
            });
            $('.secondAnswerData').html(html);
        });


        function randomInteger(min, max) {
            return Math.floor(Math.random() * (max - min + 1)) + min;
        }

        function switchCase(opers, number_1, number_2) {
            var res;
            switch (opers) {
                case 0:
                    res = number_1 + number_2;
                    break;
                case 1:
                    res = number_1 - number_2;
                    break;
                case 2:
                    res = number_1 * number_2;
                    break;
                case 3:
                    res = number_1 / number_2;
                    break;
            }
            return res;
        }

    });
</script>
@endsection