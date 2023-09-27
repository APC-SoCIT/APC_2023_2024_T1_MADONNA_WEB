{ pkgs ? import <nixpkgs> { } }:

with pkgs;

mkShell {
  buildInputs = [
    python3
    python3Packages.django
    python3Packages.django-debug-toolbar
    python3Packages.pandas
    python3Packages.matplotlib
    python3Packages.pillow
  ];
}
