<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<!-- Bootstrap -->
 <meta name="csrf-token" content="{!! csrf_token() !!} ">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style>
        body {
            background-color: #fafafa;
            font-family: 'Open Sans';
        }
        
        .container {
            margin: 150px auto;
        }
        
        .treegrid-indent {
            width: 0px;
            height: 16px;
            display: inline-block;
            position: relative;
        }
        
        .treegrid-expander {
            width: 0px;
            height: 16px;
            display: inline-block;
            position: relative;
            left: -17px;
            cursor: pointer;
        }
</style>
</head>

<body>

  @include('flash-message')

<div class="container">

  <div class="row justify-content-center">
     <div class="col-md-8">
        <div class="card">
          <div class="card-header">Tableau de bord</div>
            <div class="card-body">
            <table id="tree-table" class="table table-hover table-bordered">
             <tbody>
             @foreach($data as $d)
             <tr data-id="{{$d->_id}}" data-parent="0" data-level="1">
             <td data-column="name">{{$d->code}}</td>
            </tr>
             @if($d->verifsyn()==true)
             @include('synonymous',['synonymous' => $d->synonymous, 'dataParent' => $d->_id , 'dataLevel' => 1])@endif
                 <td>

             <a href="#" data-toggle="modal" data-target="#addsynonymous{{$d->_id}}"><span class="glyphicon glyphicon-floppy-disk"></a>

                    <div class="modal fade" id="addsynonymous{{$d->_id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog" role="document">
                             <div class="modal-content">
                             <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                      <h4 class="modal-title" id="myModalLabel">Ajouter un synonyme </h4>
                                         </div>
                                  {!! Form::open(['route' => 'synonymous.store', 'method' => 'post', 'files' => true ]) !!}
                                      <div class="modal-body">
                                      <div class="row">
                                         <div class="col-md-12">
                                         <div class="form-group">
                                         <label> Ajouter Synonyme pour {{$d->code}} <span class="text-danger">*</span></label>
                                                     <br>
                                            <input type="text" value="" class="form-control" name="name" style="width: 100%;">
                                             <div class="modal-footer">
                                             <input type="hidden" name="syn_id" value="{{$d->_id}}">
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

                    </div>
                </div>

                </tr>

                @Endforeach

                </tbody>

                </table>
            </div>
        </div>
    </div>
    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="http://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/javascript.js"></script>

</body>

</html>