import { Component, OnInit } from '@angular/core';
import { FormGroup, FormControl,AbstractControl,Validators,FormArray,ValidatorFn,ValidationErrors } from '@angular/forms';

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
  constructor() { }

  ngOnInit(): void {
  }
  submit():void{
    this.form.disable();
    this.api.postDataJson("save",this.form.getRawValue())
    .subscribe(
      data => {

      },
      err => {
        this.form.enable();
        console.log(err);
      }
    );
  }
}
