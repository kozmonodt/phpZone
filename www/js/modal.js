            var images = [
                'images/1.jpg','images/2.jpg','images/3.jpg',
                'images/4.jpg','images/5.jpg','images/6.jpg',
                'images/7.jpg','images/8.jpg','images/9.jpg',
                'images/10.jpg','images/11.jpg','images/12.jpg',
                'images/13.jpg','images/14.jpg','images/15.jpg'
            ];
            var titles = [
            'Дельфин','Пастор','Переплата',
            'Мазила','Тормоз','Опорник',
            'Пас назад','Навес','Хендо',
            'Криминал','Собака','Молодежь',
            'Жирафа','Доцик','Жопа'
        ];
            function table(cols, rows){
                document.write('<table style="border: solid;">');
                document.write('<thead><tr><td colspan = "'+cols+'" style="text-align: center;">Фоточки</td></tr></thead><tbody>');
                var iii = 0;
                for (var i=0; i< rows; i++) {
                    document.write("<tr>");
                    for (var ii=0; ii<cols; ii++){
                        document.write('<td><figure><img src="'+images[iii]+'" alt="Динозаврик" title="'+titles[iii]+
                            '" width=200 onclick="modal_shit(this)"><figcaption>'+titles[iii]+'</figcaption></figure></td>');
                        iii++;
                    }
                    document.write("</tr>");
                }
                document.write('</tbody></table>');
            }

            var span = document.getElementsByClassName("close")[0];
            var modal = document.getElementById("myModal");
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");

            // When the user clicks on <span> (x), close the modal
            /*function modal_shit(image){
                var modal = document.getElementById("myModal");
                var modalImg = document.getElementById("img01");
                var captionText = document.getElementById("caption");

                modal.style.display = "block";
                
                modalImg.src = image.src;
                captionText.innerHTML = image.alt;
            }    */
            function close_span() { 
                modal = document.getElementById("myModal");
                modal.style.display = "none";
            }
            $(document).ready(function(){
                $("img").click(function(){
                    $("#myModal").css("display", "block");
                    $("#img01").attr('src',this.src);
                    window.index = $( "img" ).index( this );
                    window.right_img = $(this).parents("td").next().children().children("img");
                    $(".number").text('фото '+ (window.index+1) +' из ' + (images.length) );
                    //$(this).parents("td").next().children().children("img").css({"color": "red", "border": "2px solid red"});
                    //$(this).parentsUntil("tr").next().css({"color": "red", "border": "2px solid red"});
                    //$(this).hide();
                });
            });
            $(document).ready(function(){
                $("#b1").click(function(){
                    alert("You entered b1!");
                });
            });

            $(document).ready(function(){
                $(".right_arrow").click(function(){
                    if(window.index == images.length-1) {
                        window.index = 0;
                    }
                    else {
                        window.index ++;
                    }
                    
                    $(".modal-content").attr('src',($( "img" ).eq( window.index ).attr("src")));
                    $(".number").text('фото '+ (window.index+1) +' из ' + (images.length) );
                    window.right_img = window.right_img.parents("td").next().children().children("img");
                });
            });
            $(document).ready(function(){
                $(".left_arrow").click(function(){
                    if(window.index == 0) {
                        window.index = images.length-1;
                    }
                    else {
                        window.index --;
                    }
                    $(".modal-content").attr('src',($( "img" ).eq( window.index ).attr("src")));
                    $(".number").text('фото '+ (window.index+1) +' из ' + (images.length) );
                });
            });
            $(document).ready(function() {
                $("#dialog").dialog();
                alert(123);
            });