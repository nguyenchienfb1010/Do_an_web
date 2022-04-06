@extends('web.layouts.master')
@section('content')



    <div class="mail animated wow zoomIn" >
        <div class="container" style="margin-top:-200px">
            <div class="mail-grids">
                <div class="col-md-8 mail-grid-left animated wow slideInLeft" data-wow-delay=".5s">
                    <form id="form" action="javascript:void(0)">
                        <div class="form-group">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="address" name="address" placeholder="Address">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <textarea name="messages" class="form-control" id="messages" cols="5" rows="5"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success btn-lg" onclick="createContact()" style="background-color: orange">Send</button>
                    </form>
                </div>
                <div class="col-md-4 mail-grid-right animated wow slideInRight" style="margin-top: 185px">
                    <div class="mail-grid-right1">
                        <h4>Eshopper</h4>
                        <ul class="phone-mail">
                            <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>Phone: +84 382 780 326</li>
                            <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>Email: <a
                                    href="mailto:info@example.com">eshopper@gmail.com</a></li>
                        </ul>
                        <ul class="social-icons">
                            <li><a href="#" class="facebook"></a></li>
                            <li><a href="#" class="twitter"></a></li>
                            <li><a href="#" class="g"></a></li>
                            <li><a href="#" class="instagram"></a></li>
                        </ul>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>

        </div>
    </div>
    <script>
        function createContact() {
            var name = $("#name").val();
            var address = $("#address").val();
            var phone = $("#phone").val();
            var subject = $("#subject").val();
            var messages = $("#messages").val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
               url: "/contactStore",
               type:"POST",
               data: {name:name,address:address,phone:phone,subject:subject,messages:messages},
               success:function(data){
                swal("Contacted Successfully !", "You clicked the button!", "success");
                $('#form')[0].reset();
               }
            });
        }
    </script>
    <!-- //mail -->
@endsection
