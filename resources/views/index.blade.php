@extends("base")

@section("content")
    <div class="d-flex justify-content-center">
        @include("calculator")
    </div>
@endsection

@push("after-script")
    <script>
        const inputCalculator = $(".input-calculator")
        $(".btn-number").on("click", function(){
            inputCalculator.val(inputCalculator.val() + $(this).data("val"));
        });
        $(".btn-condition").on("click", function(){
            if(inputCalculator.val().match(/[0-9]/i) != null && inputCalculator.val().match(/[/*\-+]/g) == null) {
                inputCalculator.val(inputCalculator.val() + $(this).data("val"));
            }
        });
        $(".btn-clean").on("click", function(){
            inputCalculator.val(null)
        });
        $(".btn-delete").on("click", function(){
            inputCalculator.val(inputCalculator.val().slice(0, -1))
        });
        $(".btn-equal").on("click", function(){
            let numberMatch = inputCalculator.val().match(/[0-9]/i);
            let conditionMatch = inputCalculator.val().match(/[/*\-+]/g);
            if(conditionMatch != null && inputCalculator.val().split(conditionMatch[0])[0].match(/[0-9]/i) != null && inputCalculator.val().split(conditionMatch[0])[1].match(/[0-9]/i) != null) {
                inputCalculator.val(eval(inputCalculator.val()));
            }
        });
    </script>
@endpush
