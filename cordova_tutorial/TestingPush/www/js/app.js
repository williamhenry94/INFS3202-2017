$(document).on('pageinit', '#home', function(){    
    
    var url = 'http://api.themoviedb.org/3/',
        mode = 'search/movie',
        movieName = '&query='+encodeURI('x-men'),        
        key = '?api_key=c1521c4eba146fa0df345bc7e474fb04';        
        console.log(url + mode + key + movieName);


    $.ajax({
        url: url + mode + key + movieName ,
        dataType: 'json',
        success: function (result) {
            ajax.parseJSONP(result);
        },
        error: function (request,error) {
            console.error('Network error has occurred please try again!');
        }
    });         
});

$(document).on('pagebeforeshow', '#headline', function(){      
    $('#movie-data').empty();
    $.each(movieInfo.result, function(i, row) {
        if(row.id == movieInfo.id) {
            $('#movie-data').append('<li><img class="poster" src="http://image.tmdb.org/t/p/w185/'+row.poster_path+'"/></li>');
            $('#movie-data').append('<li><b>Title:</b> '+row.original_title+'</li>');
            $('#movie-data').append('<li><b>Release date:</b> '+row.release_date+'</li>');
            $('#movie-data').append('<li><b>Popularity:</b> '+row.popularity+'</li>');   
            $('#movie-data').append('<li><b>Vote:</b> '+row.vote_average+'</li>'); 
            // $('#movie-data').append('<li><a id="location">Now playing in</a></li>');
            $('#movie-data').listview('refresh');            
        }
    });    
});

$(document).on('vclick', '#movie-list li a', function(){ 
    console.log(movieInfo); 
    movieInfo.id = $(this).attr('data-id');
    $.mobile.changePage( 'detail.html', { transition: 'slide', changeHash: true, data:{'movieId':movieInfo.id} });
});

// $(document).on('vclick','#location',function(){
//    $.mobile.changePage('maps.html',{transition:'slide',changeHash:true,data:{'movieId':movieInfo.id}}); 
// });

var movieInfo = {
    id : null,
    result : null
}

var ajax = {  
    parseJSONP:function(result){  
        movieInfo.result = result.results;
        console.log(result.results)
        $.each(result.results, function(i, row) {
            // console.log(JSON.stringify(row));
            $('#movie-list').append('<li><a href="" data-id="' + row.id + '"><img class="poster" src="http://image.tmdb.org/t/p/w185/'+
                row.poster_path+'"/><h3>' + row.title + '</h3><p>' + row.vote_average + '/10</p></a></li>');
        });
        $('#movie-list').listview('refresh');
    }
}       