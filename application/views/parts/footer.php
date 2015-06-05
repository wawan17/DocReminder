        </div>        
        <!-- END CONTENT -->
        
<!--         START FOOTER 
        <div id="footer">
            <small class="footer-copyright">
                &COPY; Copryright 2015 PT. Mitra Pinasthika Mustika Rent. All Right Reserved. Developed By IT Department
            </small>            
        </div>        
         END FOOTER -->
        
        
        
        
        <!-- Load Javascript --> 
        <script>



        function checkTime() {
            var today = new Date();
            var hour = today.getHours();
            var minute = today.getMinutes();
            var second = today.getSeconds();

            hour = ( hour < 10 ? "0" : "" ) + hour;
            minute = ( minute < 10 ? "0" : "" ) + minute;
            second = ( second < 10 ? "0" : "" ) + second;

            var timeString=hour+":"+minute+":"+second;
            var defaultTimeString="18:50:59";

            if(timeString===defaultTimeString) {
                $.ajax({
                    type : 'POST',
                    url : '<?php // echo base_url('document/check_document'); ?>',
                    success: function() {
                        alert('sent...');
                    }
                });
            }
        }

        $(document).ready(function (){
           

           setInterval(checkTime,1000);
           
            
           
        });
        </script>
    </body>
</html>