IOV = {
  'id':{
     'grid': 'grid',
     'tpl': 'tpl',
     'dialogContainer': 'dialogContainer'
    },
  'clazz':{
    'gridSolo': 'ui-grid-solo',
    'grid2': 'ui-grid-a',
    'grid3': 'ui-grid-b',
    'grid4': 'ui-grid-c',
    'grid5': 'ui-grid-d',
    'gridBlocks': ['ui-block-a',
                   'ui-block-b',
                   'ui-block-c',
                   'ui-block-d',
                   'ui-block-e'],
    'gridProduct': 'grid-product',
    'gridProductTitle': 'grid-product-title',
    'gridProductDesc': 'grid-product-desc',
    'gridProductImage': 'grid-product-image',
    'gridProductPrice': 'grid-product-price'
  },
  'obj': {
  },
  'ctrl': {
    'terminal_id': 1,
    'domain': '192.168.20.113'
  },
  'urls': {
    'terminal': '/terminal/',
    'viewProduct': 'productview.html',
    'hwDispense': 'https://agent.electricimp.com/DOmHZp4Mv6vw?p=1'
  },
  'current': {
    'product': undefined,
    'cart': undefined,
    'credit': 0,
    'total': 0
  },
  'timestamp': 0,
  'timestampDiff':0,
  'max':0
};

IOV.getUrl = function(url) {
  return 'http://' + IOV.ctrl.domain + url;
};

IOV.core = {
  /*
   *
   */
  requestJSONP: function(url, data, opts) {
    $.ajax({
      'url': url,
      'data': data,
      'dataType': 'jsonp',
      'jsonp' : '_callback',
      'success': opts.success,
      'error': opts.error,
      'complete': opts.complete
    });
  },
  /*
   *
   */
  requestCallbackSuccess: function(opts) {
    alert('Callback Received.');
  },
  requestCallbackError: function(opts) {
    //alert('Callback Error.');
  },
  requestCallbackComplete: function(opts) {
    alert('Callback Complete.');
  }
};

IOV.start = function(opts) {
  IOV.obj['tpl'] = $('#'+IOV.id.tpl);
  IOV.obj['grid'] = $('#' + IOV.id.grid);
  IOV.obj['gridProduct'] = $('.' + IOV.clazz.gridProduct, IOV.obj.tpl);
  IOV.core.requestJSONP(IOV.getUrl(IOV.urls.terminal) + IOV.ctrl.terminal_id , {}, {
    success: IOV.loadStock,
    error: IOV.core.requestCallbackError //TODO: try to load again.
  });
};


IOV.openCart = function() {
  $('#cartPanel').panel('open');
}

IOV.closeCart = function() {
  $('#cartPanel').panel('close');
}

IOV.getMessages = function(opts) {
  IOV.obj['tpl'] = $('#'+IOV.id.tpl);
  IOV.obj['grid'] = $('#' + IOV.id.grid);
  IOV.obj['gridProduct'] = $('.' + IOV.clazz.gridProduct, IOV.obj.tpl);
  var ts = IOV.max;
  IOV.core.requestJSONP(IOV.getUrl('/terminal/'+IOV.ctrl.terminal_id+'/messages/'+ts), {}, {
    success: IOV.messagesReceived,
    error: IOV.core.requestCallbackError //TODO: try to load again.
  });
};

IOV.messagesReceived = function(data) {
  IOV.max = data.max;
  for (var eventid in data.messages) {
    var message = data.messages[eventid];
    IOV.processMessage(message);
  }
};

IOV.processMessage = function(message) {
  var eventType = parseInt(message.event);
  var eventValue = parseInt(message.value);
  if(eventType == 1) {
    //ADD COIN
    IOV.addCredit(eventValue);
  } else if ( eventType == 2) {
    //DISPENSE
  }
};
