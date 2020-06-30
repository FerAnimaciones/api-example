import { Component, OnInit } from '@angular/core';
import { FormGroup, FormControl,AbstractControl,Validators,FormArray,ValidatorFn,ValidationErrors } from '@angular/forms';
import { BackendApiService } from "app/services/backend-api.service";
import {Router, ParamMap ,ActivatedRoute} from '@angular/router';
@Component({
  selector: 'app-formulario',
  templateUrl: './formulario.component.html',
  styleUrls: ['./formulario.component.scss']
})
export class FormularioComponent implements OnInit {
  public form: FormGroup = new FormGroup({
    idusuario:new FormControl(0),
    usuario:new FormControl(""),
    contrasena:new FormControl(""),
  });
  constructor(
    public api:BackendApiService,
    private activatedRoute: ActivatedRoute,

  ) { }

  ngOnInit(): void {
    this.activatedRoute.params.subscribe(params => {
      if(!params || Object.keys(params).length === 0){

      }else{
        console.log(params);
        this.api.getData("usuario/"+params["id"])
        .subscribe(
          data => {
            this.form.patchValue({
              idusuario:data.usuario.idusuario,
              usuario:data.usuario.usuario,
              contrasena:data.usuario.contrasena,
            });
          }
        );
      }
    });
  }
  submit():void{
    this.form.disable();
    this.api.postDataJson("save",this.form.getRawValue())
    .subscribe(
      data => {
        this.form.enable();
      },
      err => {
        this.form.enable();
        console.log(err);
      }
    );
  }
}
