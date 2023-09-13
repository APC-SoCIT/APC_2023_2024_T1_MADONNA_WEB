# Madonna's Web

## Setup

Optionally but preferrably, the project is contained within a virtual environment

```bash
# cd into the repository

# Windows
python -m venv .
.\Scripts\activate

# Linux
python3 -m venv .
source ./bin/activate
```

1. **Install dependencies**
   `pip install -r requirements.txt`

2. **Set up database**
   `python manage.py migrate`

3. **Create a superuser (optional)**
   `python manage.py createsuperuser`

4. **Run the server**
   `python manage.py runserver`