@foreach($synonymous as $synon)
		@if($synon->name!='')
        <tr data-id="{{$synon->_id}}" data-parent="{{$dataParent}}" data-level = "{{$dataLevel + 1}}">
            <td data-column="name">{{$synon->name}}</td>
       
      <td>


   <a href="#" data-toggle="modal" data-target="#updatesynonymous{{$synon->_id}}"><span class="glyphicon glyphicon-wrench"></a>
     <div class="modal fade" id="updatesynonymous{{$synon->_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
           <div class="modal-dialog" role="document">
                <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Mis a jour  </h4>
                        </div>
                    {!! Form::open(['route' => ['synonymous.update'], 'method' => 'post', 'files' => true ]) !!}
                      <div class="modal-body">
                         <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                <label> Mis a jour synonyme   </label>
                                                      <br>
                                   <input type="text" value="{!! $synon->name !!}" class="form-control" name="name" style="width: 100%;">
                                       <input type="hidden" name="syn_id" value="{!! $synon->_id !!}">
                                                    <div class="modal-footer">
                                                                            
                                         <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                                               </div>
                                         {!! Form::close() !!}
                                    </div>
                              </div>
                            </div>
                     </div>
                </div>
           </div>

  </div>
<td>
       <a href="#" data-toggle="modal" data-target="#deletesynonymous{{$synon->_id}}"><span class="glyphicon glyphicon-trash"></a>
            <div class="modal fade" id="deletesynonymous{{$synon->_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                         <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Suppression d’un synonyme </h4>
                     </div>
       {!! Form::open(['route' => ['synonymous.delete'], 'method' => 'post', 'files' => true ]) !!}
            <div class="modal-body">
              <div class="row">
               <div class="col-md-12">
                <div class="form-group">
               <label> Supprimé le synonyme</label>
                  <span class="text-danger">   
                          {{$synon->name}}</span></label>
                                         <br>                          
                  <input type="hidden" name="syn_id" value="{!! $synon->_id !!}">
               <div class="modal-footer">                         
                  <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-danger">Confirmer</button>
                 </div>
                 {!! Form::close() !!}
          </div>
     </div>
 </div>
  </div>
   </div>
    </div>
     </div>
</td>
</tr>
@endif
@endforeach
