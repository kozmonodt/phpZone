function list(type) {
                // начинается список
                document.write("<" + type + "L>");
                for (var i = 1; i < list.arguments.length; i++) {
                    // Повторить для каждого аргумента
                    document.write('<LI><a href="#' + list.arguments[i]+'">'+ list.arguments[i]+'</a></LI>');
                }
                // заканчивается список
                document.write("</" + type + "L>");
            }
