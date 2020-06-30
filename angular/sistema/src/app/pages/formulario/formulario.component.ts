import { Component, OnInit } from '@angular/core';
import { FormGroup, FormControl,AbstractControl,Validators,FormArray,ValidatorFn,ValidationErrors } from '@angular/forms';
import { BackendApiService } from "app/services/backend-api.service";
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
  ) { }

  ngOnInit(): void {
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
