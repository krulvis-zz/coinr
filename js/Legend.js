function legend(parent, data) {
    parent.className = 'legend';
    var datas = data.hasOwnProperty('datasets') ? data.datasets : data;

    datas.forEach(function(d) {
		//Title
        var title = document.createElement('span');
        title.className = 'title';
        title.style.borderColor = d.hasOwnProperty('strokeColor') ? d.strokeColor : d.color;
        title.style.borderStyle = 'solid';
        parent.appendChild(title);

        var text = document.createTextNode(d.title);
        title.appendChild(text);
		
		//Votes
		var votes = document.createElement('span');
        votes.className = 'votes';
        //title.style.borderColor = d.hasOwnProperty('strokeColor') ? d.strokeColor : d.color;
        //title.style.borderStyle = 'solid';
        parent.appendChild(votes);

        var text = document.createTextNode(d.votes);
        votes.appendChild(text);
    });
}