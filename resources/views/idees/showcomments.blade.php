<div class="container" xmlns:input="http://www.w3.org/1999/html">
    <br>
    <br>
    <div class="row rowcom">
    <img src="{{ asset('img/conversation.png') }}" alt="" class="conv-img"><h2 class="h2com">{{count($idea-> comments)}} Commentaires  </h2> &nbsp;&nbsp;<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">+ Ajouter un commentaire</button>
   </div>
    <p></p>
    <div class="ex1">
    <table class="table">
        <thead>
        <tr>

            <th>Commentaire</th>

        </tr>
        </thead>
        <tbody>
        <?php $i = 0 ?>
        @forelse($idea->comments as $comment)
        <?php $i++ ?>
        <tr class="color-{{ $i%2 }}">
            <td>{{$comment->contenu}}</td>
            @if (Auth::user() != "")
                <td>
                    <a href="{{action("CommentController@destroy" , $comment->id)}}"  title="Supprimer" data-confirm="Voulez-vous vraiment supprimer" data-method="delete"><i class="fa fa fa-fw fa-trash"></i></a>
                </td>
            @endif
        </tr>
        @empty
        @endforelse
        </tbody>
    </table>
        </div>
    <br>
    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Saisir un commentaire</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    {!! Form::model(
                         null,
                         array(
                            'class'     => 'form-horizontal',
                             'url'      => action('CommentController@store'  , null),
                             'method'   => 'Post'
                            )
                     ) !!}

                        <div class="form-group">
                            <label for="comment">Commentaire:</label>
                            {!! Form::textarea( 'contenu' , null , array( 'class' => 'form-control'  ) ) !!}

                        </div>
                    <div class="form-group">

                        {!! Form::hidden('idea_id', $idea->id) !!}

                    </div>



                            <div class="form-group">
                                <h6>Email</h6>
                                {!! Form::text( 'email' , null , array( 'class' => 'form-control' , 'placeholder' => "Entrer un email" ) ) !!}
                            </div>



                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" >Sauvegarder</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
    <div class="modal" id="infos">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Plus d'informations</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    {!! Form::model(
                         null,
                         array(
                            'class'     => 'form-horizontal',
                             'url'      => action('RateController@store'  , null),
                             'method'   => 'Post',
                             'id'       => 'rating-form'
                            )
                     ) !!}

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class=form-control" name="email" id="email" placeholder="Votre email">

                    </div>
                    <div class="form-group">
                        <input type="hidden" class=form-control" name="cle-idee" id="cle-idee"  value={!!$idea->uniqueId!!}>

                    </div>
                    @include('idees.starrating', array('id' => 'modal-confirmation'))
                </div>


                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button id="save" type="button" class="btn btn-primary" >Enregistrer</button>
                        <button id="close" type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
</div>